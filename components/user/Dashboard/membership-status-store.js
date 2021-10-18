import {
  writable
} from 'svelte/store';
import API_VERSION from './../../API';

let data = writable([]);


const apiURL = "/index.php/api/" + API_VERSION + "/membership-status";

async function getData() {
  const response = await fetch(apiURL);
  let responseData = {};
  responseData = (await response.json());
  data.set(responseData);
}
getData();

export const membershipStatusStore = data;
