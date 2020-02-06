require("./SmoothScroll");

export default class SmoothScrollManager {
    constructor() {
        var scroller = new SmoothScroll({
            target: document.getElementById("main"), // element container to scroll
            scrollEase: 0.05,
        });
    }
}