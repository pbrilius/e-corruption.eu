import TotalUsers from '../components/administration/Dashboard/basic-ETL/total-users.svelte';
export const totalUsers = new TotalUsers({
  target: document.getElementById('totalUsers')
});

import TotalLoans from '../components/administration/Dashboard/basic-ETL/total-loans.svelte';
export const totalLoans = new TotalLoans({
  target: document.getElementById('totalLoans')
});

import TotalPayments from '../components/administration/Dashboard/basic-ETL/total-payments.svelte';
export const totalPayments = new TotalPayments({
  target: document.getElementById('totalPayments')
});

import TotalBots from '../components/administration/Dashboard/basic-ETL/total-audit-bots.svelte';
export const totalBots = new TotalBots({
  target: document.getElementById('totalBots')
});
