'use strict';

const p = console.log;

const urlRandomPrefecture = 'http://localhost:20180/random-prefecture';
const urlPrefecturalCapital = 'http://localhost:20080/prefectural-capital/';

fetch(urlRandomPrefecture)
  .then((res) => res.json())
  .then((jsonRP) => {
    const prefecture = jsonRP.prefecture;
    fetch(urlPrefecturalCapital + encodeURI(prefecture))
      .then((res) => res.json())
      .then((jsonPC) => {
        const capital = jsonPC[0]._value;
        const msg = `${prefecture}の首都は${capital}です。`;
        p(msg);
      });
  });
