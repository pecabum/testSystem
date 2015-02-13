/**
 * Created by Emanuil on 13/02/2015.
 */
define(["constants", "testBuilder", "domWorker"], function (constants, testBuilder, dom) {
    var validate = function validate(testJson) {
        try {
            var obj = JSON.parse(testJson);
            if (!(obj instanceof Array)) {
                console.error("JSON is not an array!");
                return null;
            }
            for (var i = 0; i < obj.length; i++) {
                var testObject = obj[i];
                var valid = true;
                valid &= testObject.hasOwnProperty("id");
                valid &= testObject.hasOwnProperty("question");
                valid &= testObject.hasOwnProperty("answers");
                if (!valid) return null;
                var answers = testObject.answers;
                for (var j = 0; j < answers.length; j++) {
                    var answer = answers[j];
                    valid &= answer.hasOwnProperty("id");
                    valid &= answer.hasOwnProperty("answer");
                    if (!valid) return null;
                }
            }
            return obj;
        } catch (e) {
            return null;
        }
    }

    return function loadJson(divElement) {
        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                var testJson = validate(request.responseText);
                if (testJson) {
                    var pagedDisplay = false;
                    var testContent = testBuilder.build(testJson, pagedDisplay);
                    divElement.appendChild(testContent);
                } else {
                    console.error("BAD JSON!");
                }
            }
        };
        request.open("GET", dom.getUrl() + constants.getString("jsonPath"), true);
        request.send();
    }
});