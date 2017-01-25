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

export const toggleClasses = (el, from, to) => {
  el.classList.remove(from);
  el.classList.add(to);
};

export default {
  toggleMenu,
  toggleClasses
};
