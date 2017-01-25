export default [
  {
    selector: `.menu`,
    element: `.container`,
    stateI: `nav-close`,
    stateII: `nav-open`,
    sync: false,
    tway: false
  },
  {
    selector: `.close-menu`,
    element: `.container`,
    stateI: `nav-close`,
    stateII: `nav-open`,
    sync: false,
    tway: false
  },
  {
    selector: `.toggle-list`,
    element: `.more-list`,
    stateI: `close-list`,
    stateII: `open-list`,
    sync: false,
    tway: false
  },
  {
    selector: `.zones-btn`,
    element: [`.zones`, `.quick-main-nav`],
    stateI: `quick-invisible`,
    stateII: `quick-visible`,
    sync: false,
    tway: false
  },
  {
    selector: `.close-zones`,
    element: [`.zones`, `.quick-main-nav`],
    stateI: `quick-visible`,
    stateII: `quick-invisible`,
    sync: false,
    tway: false
  },
  {
    selector: `.search-overlay`,
    element: [`.search-header`, `.search-overlay`],
    stateI: `n-away`,
    stateII: `away`,
    sync: true,
    tway: false
  },
  {
    selector: `.search`,
    element: [`.search-header`, `.search-overlay`],
    stateI: `away`,
    stateII: `n-away`,
    sync: true,
    tway: true
  }
];
