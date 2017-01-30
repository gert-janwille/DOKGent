import {ToggleData} from './data/';

import {toggleMenu, toggleFilter} from './modules/util/Toggle';
import {mapVal} from './modules/util/Mathutil';
import {makeItem, html} from './modules/util/Html';

import {isArray, isEmpty} from 'lodash';
import fetch from 'isomorphic-fetch';

let bar, deviceHeight, form;

const init = () => {
  const $progressFill = document.querySelector(`.fill-load`);
  const $Pheader = document.querySelector(`.program-header`);
  const $filterbtn = document.querySelector(`.filter-down`);
  const $footer = document.querySelector(`footer`);

  bar = document.querySelector(`.progress-bar`);
  form = document.querySelector(`.event-filter`);

  if (location.search === ``) {
    deviceHeight = bar.clientHeight;
    scrollProgressBar($progressFill, deviceHeight, $footer);

    window.addEventListener(`resize`, () => deviceHeight = bar.clientHeight);
    document.addEventListener(`scroll`, () => window.requestAnimationFrame(() => scrollProgressBar($progressFill, deviceHeight, $footer)));
  }

  if (location.search === `?page=events`) {
    $filterbtn.addEventListener(`click`, e => toggleFilter(e, $Pheader, $filterbtn));
    for (let i = 0;i < form.elements.length;i ++) form.elements[i].addEventListener(`change`, submitHandler);
    form.addEventListener(`submit`, submitHandler);
  }

  initMenus().map(el => document.querySelector(el.selector).addEventListener(`click`, e => toggleMenu(e, (isArray(el.element)) ? [document.querySelector(el.element[0]), document.querySelector(el.element[1])] : document.querySelector(el.element), el.stateI, el.stateII, el.sync, el.tway)));

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

  letterAnimation(scroll);
};

const letterAnimation = scroll => {
  const $letters = document.querySelectorAll(`.big-letter`);
  const val = scroll * .02;

  $letters.forEach((el, id) => {

    let spacing = 30 + (id * 10);
    if (id === 2) spacing -= 20;
    if (id === 4) spacing -= 5;

    el.style.marginTop = `${val - spacing}%`;
  });
};

const submitHandler = e => {
  e.preventDefault();
  const $articleContainer = document.querySelector(`.program-container`);
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

  const method = `POST`;
  const body = formData;
  const headers = new Headers({'x-requested-with': `ajax`});

  fetch(`index.php?page=api&fetch=filter`, {method, headers, body})
    .then(r => r.json())
    .then(data => {
      const myNode = document.querySelector(`.program-container`);
      while (myNode.firstChild) {
        myNode.removeChild(myNode.firstChild);
      }

      let elCounter = 0;

      if (!isEmpty(data)) {
        data.map(el => {
          makeItem(el, elCounter, $articleContainer);
          elCounter ++;
        });
      } else {
        const sorry = html(`<div class="sorry-no-events">
          <h1>Sorry, we vonden geen evenementen.</h1>
          <p>Probeer een andere datum of tag.</p>
        </div>`);
        $articleContainer.appendChild(sorry);
      }
    });
};


init();
