'use strict';

const p = console.log;

const urlRandomPrefecture = 'http://localhost:20180/random-prefecture';
const url = 'http://localhost:20080/prefectural-capital/' + encodeURI('東京都');

p(unescape(encodeURI('東京都')));
p(encodeURI('東京都'));
