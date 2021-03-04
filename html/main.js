'use strict';

const urlRandomPrefecture = 'http://localhost:20180/random-prefecture';

const p = console.log;

fetch(urlRandomPrefecture)
  .then((res) => res.json())
  .then(p);
