/**
 * Created by Emanuil on 13/02/2015.
 */
define(["domWorker", "constants"], function (dom, constants) {
    var questionBlocks = [];
    var selected = {};
    var form;
    var questionHolder;
    var isPaged;
    var btnChange;
     var someBlockDiv;
    /*route : /questions/{userId}
     method : POST
     expected variable : answersArray*/
    /**
     * 
     */
    var post = function(path, params, method) {
        method = method || "post"; // Set method to post by default if not specified.

        // The rest of this code assumes you are not using a library.
        // It can be made less wordy if you use one.
        var form = document.createElement("form");
        form.setAttribute("method", method);
        form.setAttribute("action", path);

        for(var key in params) {
            if(params.hasOwnProperty(key)) {
                var hiddenField = document.createElement("input");
                hiddenField.setAttribute("type", "hidden");
                hiddenField.setAttribute("name", key);
                hiddenField.setAttribute("value", params[key]);

                form.appendChild(hiddenField);
            }
        }

        document.body.appendChild(form);
        form.submit();
    };

    var buildAnswer = function (answerObj, questionId) {
        var answerNode = dom.getElem("DIV", "test-question-radio", null);

        var radioBtn = dom.getElem("INPUT",null,null);
        radioBtn.setAttribute("type", "radio");
        radioBtn.setAttribute("name", "question" + questionId);
        radioBtn.setAttribute("id", "radio" + answerObj["id"]);
        radioBtn.setAttribute("style","margin-left:15px;margin-bottom:10px;");
       
        radioBtn.onclick = function () {
            selected[answerObj["id"]] = !!this.checked;
            console.log(this.value);
        };
        answerNode.appendChild(radioBtn);
        answerNode.setAttribute("style", "display: block;");

        var txt = dom.getElem("LABEL", null,answerObj["answer"]);
        txt.setAttribute("for","radio" + answerObj["id"]);
        txt.setAttribute("style","margin-left:15px;");
        answerNode.appendChild(txt);
        answerNode.onmouseover = function () {
            this.style.backgroundColor = '#E0E0E0';
        };
        answerNode.onmouseout = function () {
            this.style.backgroundColor = '#DDEEEE';
        };
        return answerNode;
    };

    var buildQuestion = function (questionObj, order) {
        var container = dom.getElem("DIV", ".test-question",null);
        
        var textDiv = dom.getElem("DIV", ".test-question-text", order + 1 + ". " + questionObj["question"]);
        textDiv.setAttribute("style", "margin-bottom:15px;");
        container.appendChild(textDiv);
        
        var answersObj = questionObj["answers"];
        for (var i = 0; i < answersObj.length; i++) {
            var answerElem = buildAnswer(answersObj[i], questionObj["id"]);
            container.appendChild(answerElem);
        }
        container.setAttribute("style", "border-radius: 15px;background-color: #DDEEEE; margin:10px auto;border: 5px solid #a1a1a1; padding: 10px 10px; width: 700px; display: block; border-style: groove;");
        return container;
    };

    var createSaveButton = function() {

        var btn = dom.getElem("INPUT");
        btn.setAttribute("type", "button");
        btn.setAttribute("value", "Предай");
        btn.setAttribute("class", "myButton");
        btn.setAttribute("style", "margin:auto;display:block;"); 

        btn.onclick = function () {
            var array = [];
            for (var key in selected) {
                if (selected[key]) {
                    array.push(key);
                }
            }
            var userId = document.getElementById(constants.getString("userId")).getAttribute("value");
            post(dom.getUrl() + "/questions/" + userId, {answersArray :array});
        };
        return btn;
    };

    var pagedNavigation = function () {
        var currentQuestion = 0;
        var btnPrev = dom.getImgButton(constants.getString("prevImg"), "Previous question");
        var btnNext = dom.getImgButton(constants.getString("nextImg"), "Next question");

        var fillIn = function () {
            while (questionHolder.firstChild) {
                questionHolder.removeChild(questionHolder.firstChild);
            }
            var centeredDiv = dom.getElem("DIV");
            centeredDiv.setAttribute("style", "margin:auto;display: table;padding:20px;"); 
            if (currentQuestion != 0) {
                centeredDiv.appendChild(btnPrev);
            }
            centeredDiv.appendChild(btnChange);
            if (currentQuestion != questionBlocks.length - 1) {
                centeredDiv.appendChild(btnNext);
            }
            questionHolder.appendChild(centeredDiv);
            questionHolder.appendChild(questionBlocks[currentQuestion]);

        };
        btnPrev.onclick = function () {
            currentQuestion--;
            fillIn();
        };
        btnNext.onclick = function() {
            currentQuestion++;
            fillIn();
        };
        fillIn();
    };

    var repaint = function () {
        while (questionHolder.firstChild) {
            questionHolder.removeChild(questionHolder.firstChild);
        }

        if (isPaged) {
            pagedNavigation();
        } else {
            questionHolder.appendChild(someBlockDiv);
            someBlockDiv.appendChild(btnChange);
            for (var i = 0; i < questionBlocks.length; i++) {
                questionHolder.appendChild(questionBlocks[i]);
            }
        }
    };
    return {
        build : function (testObj, paged) {
            btnChange = dom.getImgButton(constants.getString("changeImg"), "Change mode");
            btnChange.onclick = function () {
                isPaged = !isPaged;
                repaint();
            };

            isPaged = paged;
            form = dom.getElem("FORM", ".test");
            questionHolder = dom.getElem("DIV");
            someBlockDiv = dom.getElem("DIV");
            someBlockDiv.setAttribute("style", "margin:auto;display:table;padding:20px;");
            someBlockDiv.appendChild(btnChange);
            questionHolder.appendChild(someBlockDiv);
            for (var i = 0; i < testObj.length; i++) {
                questionBlocks.push(buildQuestion(testObj[i], i));
                if (!paged) {
                    questionHolder.appendChild(questionBlocks[i]);
                }
            }
            if (paged) {
                pagedNavigation();
            }
            form.appendChild(createSaveButton());
            form.appendChild(questionHolder);
            return form;
        }
    }
});

