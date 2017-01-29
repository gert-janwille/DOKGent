import {ToggleData} from './data/';

import {toggleMenu, toggleFilter} from './modules/util/Toggle';
import {mapVal} from './modules/util/Mathutil';
import {html} from './modules/util/Html';

import {isArray} from 'lodash';
import fetch from 'isomorphic-fetch';

let bar, deviceHeight, form;

const init = () => {

  //if (document.readyState === `loading`) document.querySelector(`.loading`).style.display = `flex`;

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

  if (location.search === `?page=events`) for (let i = 0;i < form.elements.length;i ++) form.elements[i].addEventListener(`change`, submitHandler);
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
    .then(data => {
      const myNode = document.querySelector(`.program-container`);
      while (myNode.firstChild) {
        myNode.removeChild(myNode.firstChild);
      }

      const max = data.length;
      let elCounter = 0;

      data.map(el => {
        makeItem(el, elCounter, max);
        elCounter ++;
      });
    });
};

const makeItem = (el, elCounter) => {
  const $articleContainer = document.querySelector(`.program-container`);

  let classArtikel;
  switch (elCounter % 7) {
  case 0:
    classArtikel = `item-one`;
    break;
  case 1:
    classArtikel = `item-two`;
    break;
  case 2:
    classArtikel = `item-tree`;
    break;
  case 3:
    classArtikel = `item-four`;
    break;
  case 4:
    classArtikel = `item-five`;
    break;
  case 5:
    classArtikel = `item-six`;
    break;
  case 6:
    classArtikel = `item-seven`;
    break;
  }

  console.log(classArtikel);

  const firstLine = el.description.split(`.`)[0];
  const dateObject = new Date(Date.parse(el.start));

  const dag = dateObject.getDate();

  const monthNames = [`January`, `February`, `March`, `April`, `May`, `June`,
    `July`, `August`, `September`, `October`, `November`, `December`
  ];
  const maand = dateObject.getMonth();

  const article = html(`<article class="${classArtikel} event-item">
    <img src="./assets/img/program/${el.image.split(` `)[0]}" height="100%" alt="">
    <a href="index.php?page=detail&amp;id=${el.id}" class="text-event-item">
      <h2>${el.locations[0].name}</h2>
      <h1>${el.title}</h1>

      <div class="hover-event-item">
        <p>${firstLine}</p>
        <p class="time-event-item">${dag, monthNames[maand]}</p>
      </div>
    </a>
  </article>`);
  $articleContainer.appendChild(article);
};


init();
