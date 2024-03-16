import {Application} from '@hotwired/stimulus';
import slideshow_controller from '../controllers/slideshow_controller';
import '../../css/alert.css';
import '../../css/base.css';
import '../../css/card.css';

const stimulus = Application.start();
stimulus.register('slideshow', slideshow_controller);