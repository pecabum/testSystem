/**
 * Stores immutable constants.
 * Therefore they can only be set once.
 *
 * Created by Emanuil on on 15-1-5.
 */

define([], function() {
    var values = {};
    var getString = function(key) {
        if (key in values) {
            return values[key];
        }
        return undefined;
    };

    /**
     * Sets value of a constant, unless it is already present!
     * @param key
     * @param newValue
     */
    var setString = function (key, newValue) {
        if (key in values) {
            console.log("Cannot overwrite constant " + key);
        } else {
            values[key] = newValue;
        }
    };

    return {
        getString: getString,
        setString: setString
    };
});