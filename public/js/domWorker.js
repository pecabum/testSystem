/**
 * Utility functions for dom manipulation.
 * Created by Emanuil on 14-12-5.
 */
define([], function() {
    "use strict";

    /**
     * Generates an HTML element
     * @param type tagName of element. (i.e. "DIV"). Note that
     * this should be capital case.
     * @param classAttr -> Used for styling afterwards
     */
    var getElem = function (type, classAttr, textContent) {
        var elem = document.createElement(type);
        if (typeof classAttr !== 'undefined' && classAttr !== null) {
            elem.setAttribute("class", classAttr);
        }
        if (typeof textContent !== 'undefined' && textContent !== null) {
            elem.appendChild(document.createTextNode(textContent));
        }
        return elem;
    };

    var getImgButton = function (imgLocation, alt) {
        var s = document.createElement("img");
        s.setAttribute('src', imgLocation);
        s.setAttribute('alt', alt);
        return s;
    };
    
    var getBaseURL = function() {
        "use strict";
        return location.protocol + "//" + location.hostname +  (location.port && ":" + location.port) + "/laraPro/public/";
    };

    return {
        getElem: getElem,
        getImgButton: getImgButton,
        getUrl: getBaseURL
    };
});