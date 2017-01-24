export default [
  {
    selector: `.menu`,
    element: `.container`,
    stateI: `nav-close`,
    stateII: `nav-open`
  },
  {
    selector: `.close-menu`,
    element: `.container`,
    stateI: `nav-close`,
    stateII: `nav-open`
  },
  {
    selector: `.toggle-list`,
    element: `.more-list`,
    stateI: `close-list`,
    stateII: `open-list`
  },
  {
    selector: `.zones-btn`,
    element: [`.zones`, `.quick-main-nav`],
    stateI: `quick-invisible`,
    stateII: `quick-visible`
  },
  {
    selector: `.close-zones`,
    element: [`.zones`, `.quick-main-nav`],
    stateI: `quick-visible`,
    stateII: `quick-invisible`
  }
];
