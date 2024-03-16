import {Controller} from '@hotwired/stimulus';

export default class extends Controller<HTMLDivElement> {
    static targets = ['slide'];
    static values = {index: Number, default: 0};

    declare indexValue: number;
    declare readonly slideTargets: HTMLElement[];

    next(): void {
        if (this.indexValue < (this.slideTargets.length - 1)) {
            this.indexValue++;
        }
    }

    previous(): void {
        if (this.indexValue > 0) {
            this.indexValue--;
        }
    }

    indexValueChanged(): void {
        this.showCurrentSlide();
    }

    showCurrentSlide(): void {
        this.slideTargets.forEach((element, index) => {
            element.hidden = index !== this.indexValue;
        });
    }
}