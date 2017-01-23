import es6Promise from 'es6-promise';
import {toggleMenu} from './modules/util/Toggle';
// import fetch from 'isomorphic-fetch';
es6Promise.polyfill();

const init = () => {
  console.log(`Hello Boilerplate`);

  const $container = document.querySelector(`.container`);
  const $zones = document.querySelector(`.zones`);
  const $main = document.querySelector(`.quick-main-nav`);

  document.querySelector(`.menu`).addEventListener(`click`, e =>
    toggleMenu(e, $container, `nav-close`, `nav-open`));
  document.querySelector(`.close-menu`).addEventListener(`click`, e =>
    toggleMenu(e, $container, `nav-close`, `nav-open`));

  document.querySelector(`.toggle-list`).addEventListener(`click`, e =>
    toggleMenu(e, document.querySelector(`.more-list`), `close-list`, `open-list`));

  document.querySelector(`.zones-btn`).addEventListener(`click`, e =>
    toggleMenu(e, [$zones, $main], `quick-invisible`, `quick-visible`));
  document.querySelector(`.close-zones`).addEventListener(`click`, e =>
    toggleMenu(e, [$zones, $main], `quick-visible`, `quick-invisible`));
};

init();
