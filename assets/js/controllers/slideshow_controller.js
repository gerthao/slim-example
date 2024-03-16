import {Controller} from '@hotwired/stimulus';

export default class extends Controller {
    static targets = ['slide'];
    static values = {index: Number, default: 0};

    next() {
        if (this.indexValue < (this.slideTargets.length - 1)) {
            this.indexValue++;
        }
    }

    previous() {
        if (this.indexValue > 0) {
            this.indexValue--;
        }
    }

    indexValueChanged() {
        this.showCurrentSlide();
    }

    showCurrentSlide() {
        this.slideTargets.forEach((element, index) => {
            element.hidden = index !== this.indexValue;
        });
    }
}