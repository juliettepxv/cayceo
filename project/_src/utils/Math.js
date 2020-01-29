export default class UtilsMath{
    /**
     * Renvoie la valeur d'input et la mondifie si elle ne rentre pas dans min - max
     * @param {number} input
     * @param {number} min
     * @param {number} max
     * @returns {number}
     */
    range(input,min=0,max=100){
        input=Math.max(input,min);
        input=Math.min(input,max);
        return input;
    }

    /**
     * Renvoie un nombre compris entre min et max
     * @param {number} min
     * @param {number}max
     * @param {number} step
     * @returns {number}
     */
    rand(min,max,step=1.0){
        return window.round(Math.random() * (max - min ) + min,step)
    };
    /**
     * Arrondit un nombre
     * @param {number} value
     * @param {number} step 1.0 arrondit à l'entier 0.25 arrondit à 0.25 0.1 arrondit à une décimale
     * @returns {number}
     */
    round(value, step=1.0){
        step || (step = 1.0);
        var inv = 1.0 / step;
        return Math.round(value * inv) / inv;
    };
    /**
     * Renvoie un nombre relatif à un autre espace de valeurs
     * @param {number} inputValue
     * @param {number} inputMax
     * @param {number} outputMax
     * @param {number} inputMin
     * @param {number} outputMin
     * @returns {number}
     */
    ratio(inputValue, inputMax, outputMax, inputMin=.0, outputMin=.0){
        if(isNaN(inputValue)){
            console.warn("inputValue isNaN");
        }
        let product = (inputValue - inputMin) / (inputMax - inputMin);
        return ((outputMax - outputMin) * product) + outputMin;
    };

}