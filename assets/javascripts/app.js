import {Application, Controller} from "https://unpkg.com/@hotwired/stimulus/dist/stimulus.js";

window.Stimulus = Application.start();

Stimulus.register('slideshow', class extends Controller {
    static targets = ['slide'];
    static values = {index: Number, default: 0};

    next() {
        if (this.indexValue < (this.slideTargets.length - 1)) this.indexValue++;
    }

    previous() {
        if (this.indexValue > 0) this.indexValue--;
    }

    indexValueChanged() {
        this.showCurrentSlide();
    }

    showCurrentSlide() {
        this.slideTargets.forEach((element, index) => {
            element.hidden = index !== this.indexValue;
        });
    }
});