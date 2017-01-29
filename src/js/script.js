import {ToggleData} from './data/';

import {toggleMenu, toggleFilter} from './modules/util/Toggle';
import {mapVal} from './modules/util/Mathutil';

import {isArray} from 'lodash';
import fetch from 'isomorphic-fetch';

let bar, deviceHeight, form;

const init = () => {
  const $progressFill = document.querySelector(`.fill-load`);
  const $Pheader = document.querySelector(`.program-header`);
  const $filterbtn = document.querySelector(`.filter-down`);
  const $footer = document.querySelector(`footer`);
  bar = document.querySelector(`.progress-bar`);

  if (location.search === ``) deviceHeight = bar.clientHeight;

  window.addEventListener(`resize`, () => {
    if (location.search === ``) deviceHeight = bar.clientHeight;
  });
  document.addEventListener(`scroll`, () => {
    if (location.search === ``) window.requestAnimationFrame(() => scrollProgressBar($progressFill, deviceHeight, $footer));
  });

  initMenus().map(el => document.querySelector(el.selector).addEventListener(`click`, e => toggleMenu(e, (isArray(el.element)) ? [document.querySelector(el.element[0]), document.querySelector(el.element[1])] : document.querySelector(el.element), el.stateI, el.stateII, el.sync, el.tway)));

  if (location.search === ``) scrollProgressBar($progressFill, deviceHeight, $footer);

  if (location.search === `?page=events`) $filterbtn.addEventListener(`click`, e => toggleFilter(e, $Pheader, $filterbtn));

  form = document.querySelector(`.event-filter`);

  if (location.search === `?page=events`) form.addEventListener(`submit`, submitHandler);
};


const initMenus = () => {
  const pageElements = [];

  ToggleData.map(el => {
    switch (el.location) {
    case `all`:
      pageElements.push(el);
      break;

    case `home`:
      if (location.search === ``) pageElements.push(el);
      break;
    }
  });

  return pageElements;
};

const scrollProgressBar = (progressFill, deviceHeight, footer) => {

  const max = (document.body.scrollHeight - window.innerHeight) - deviceHeight - footer.scrollHeight;
  const endScroll = (document.body.scrollHeight - window.innerHeight) - footer.scrollHeight;

  const scroll = window.scrollY;

  const header = 60;

  if (scroll >= deviceHeight + header) bar.style.top = `${scroll + header}px`;
  if (scroll >= endScroll - header) bar.style.top = `${endScroll}px`;

  const scrolVal = mapVal(scroll - deviceHeight, header, max, 0, 100);
  progressFill.style.height = `${scrolVal}%`;
};

const submitHandler = e => {
  e.preventDefault();

  const formData  = new FormData();

  for (let i = 0;i < form.elements.length;i ++) {
    const el = form.elements[i];

    if (el.name === `date`) {
      formData.append(el.name, el.value);
    } else {
      if (el.name.startsWith(`item`) || el.name.startsWith(`location`)) {
        if (el.checked) formData.append(el.name, el.value);
      }
    }
  }

  // TODO: make class api for these things & eventlistner on change form
  // maybe nee to copy the for loop form elements to add seperated event listenrs

  const method = `POST`;
  const body = formData;
  const headers = new Headers({'x-requested-with': `ajax`});

  fetch(`index.php?page=api&fetch=filter`, {method, headers, body})
    .then(r => r.json())
    .then(b => console.log(b));
};


init();
