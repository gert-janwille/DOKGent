import {isArray} from 'lodash';

export const toggleMenu = (e, el, stateI, stateII) => {
  e.preventDefault();

  if (isArray(el)) {
    const isClosed = el[0].classList.contains(stateI);

    if (isClosed) {
      toggleClasses(el[1], stateII, stateI);
      toggleClasses(el[0], stateI, stateII);
    }

  } else {
    const  isClosed = el.classList.contains(stateI);
    isClosed ? toggleClasses(el, stateI, stateII) : toggleClasses(el, stateII, stateI);
  }
};

export const toggleClasses = (el, from, to) => {
  el.classList.remove(from);
  el.classList.add(to);
};

export default {
  toggleMenu,
  toggleClasses
};
