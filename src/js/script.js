import {ToggleData} from './data/';

import {toggleMenu} from './modules/util/Toggle';
import {mapVal} from './modules/util/Mathutil';

import {isArray} from 'lodash';
// import fetch from 'isomorphic-fetch';

let bar, deviceHeight;

const init = () => {
  const $progressFill = document.querySelector(`.fill-load`);

  bar = document.querySelector(`.progress-bar`);
  deviceHeight = bar.clientHeight;

  ToggleData.map(el => document.querySelector(el.selector).addEventListener(`click`, e => toggleMenu(e, (isArray(el.element)) ? [document.querySelector(el.element[0]), document.querySelector(el.element[1])] : document.querySelector(el.element), el.stateI, el.stateII)));

  window.addEventListener(`resize`, () => deviceHeight = bar.clientHeight);

  document.addEventListener(`scroll`, () => {
    window.requestAnimationFrame(() => scrollProgressBar($progressFill, deviceHeight));
  });

  scrollProgressBar($progressFill, deviceHeight);

};

const scrollProgressBar = (progressFill, deviceHeight) => {

  const max = (document.body.scrollHeight - window.innerHeight) - deviceHeight;
  const scroll = window.scrollY;

  if (scroll >= deviceHeight) bar.style.top = `${scroll}px`;

  const scrolVal = mapVal(scroll - deviceHeight, 0, max, 0, 100);
  progressFill.style.height = `${scrolVal}%`;
};


init();
