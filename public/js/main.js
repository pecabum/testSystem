/**
 * Created by Emanuil on 13/02/2015.
 */
require(["constants"], function (constants) {

    var testDiv = document.getElementById("testDiv");
    if (testDiv) {
        constants.setString("jsonPath", "/questions");
        constants.setString("nextImg", "../images/next.png");
        constants.setString("prevImg", "../images/prev.png");
        constants.setString("changeImg", "../images/change.png");
        constants.setString("userId", "qwerty");

        require(["testGenerator"], function (gen) {
            gen(testDiv);
        });
    } else {
        // Add else ifs for other pages...
    }
    // Add here stuff that will execute on each page
});

