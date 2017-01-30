export const makeItem = (el, elCounter, $articleContainer) => {
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

  const firstLine = el.description.split(`.`)[0];
  const dateObject = new Date(Date.parse(el.start));

  const dag = dateObject.getDate();
  const monthNames = [`January`, `February`, `March`, `April`, `May`, `June`, `July`, `August`, `September`, `October`, `November`, `December`];
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

export const html = (strings, ...values) => {
  let str = ``;

  if (Array.isArray(strings)) {
    for (let i = 0;i < strings.length;i ++) {
      if (strings[i]) str += strings[i];
      if (values[i]) str += values[i];
    }
  } else {
    str = strings;
  }

  const doc = new DOMParser().parseFromString(str.trim(), `text/html`);

  return doc.body.firstChild;
};

export default {
  html,
  makeItem
};
