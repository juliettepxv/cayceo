export default class UtilsArray{
    /**
     * Renvoie une entrée aléatoire
     * @param {Array} array
     * @returns {*}
     */
    randomEntry(array){
        return array[Math.floor(Math.random() * array.length)];
    };
}