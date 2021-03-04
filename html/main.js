'use strict';

const p1 = document.getElementById('p1');
const urlRandomPrefecture = 'http://localhost:20180/random-prefecture';
const urlPrefecturalCapital = 'http://localhost:20080/prefectural-capital/';

const jsonReturn = (obj) => obj.json();

const asyncMain = async () => {
  const prefecture = await fetch(urlRandomPrefecture)
    .then(jsonReturn)
    .then((json) => json.prefecture);

  const urlPrefecturalCapitalWithParam = urlPrefecturalCapital + encodeURI(prefecture);

  const capital = await fetch(urlPrefecturalCapitalWithParam)
    .then(jsonReturn)
    .then((json) => json[0]._value);

  const msg = `${prefecture}の首都は${capital}です。`;

  p1.innerHTML = msg;
};

asyncMain();
