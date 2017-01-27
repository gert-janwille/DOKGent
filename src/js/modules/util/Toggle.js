import {isArray} from 'lodash';

export const toggleMenu = (e, el, stateI, stateII, sync, tway) => {
  e.preventDefault();

  if (!isArray(el)) {
    const  isClosed = el.classList.contains(stateI);
    isClosed ? toggleClasses(el, stateI, stateII) : toggleClasses(el, stateII, stateI);

  } else {
    const isClosed = el[0].classList.contains(stateI);

    if (isClosed) {
      if (sync) {
        toggleClasses(el[0], stateI, stateII);
        toggleClasses(el[1], stateI, stateII);
      } else {
        toggleClasses(el[1], stateII, stateI);
        toggleClasses(el[0], stateI, stateII);
      }
    } else if (tway) {
      toggleClasses(el[0], stateII, stateI);
      toggleClasses(el[1], stateII, stateI);
    }
  }
};

export const toggleFilter = (e, header, btn) => {
  e.preventDefault();

  const isOpen = header.classList.contains(`filter-open`);

  if (isOpen) {
    header.classList.remove(`filter-open`);
    btn.classList.remove(`filter-up`);
    btn.classList.add(`filter-down`);
  } else {
    header.classList.add(`filter-open`);
    btn.classList.remove(`filter-down`);
    btn.classList.add(`filter-up`);
  }
};

export const toggleClasses = (el, from, to) => {
  el.classList.remove(from);
  el.classList.add(to);
};

export default {
  toggleMenu,
  toggleClasses,
  toggleFilter
};
