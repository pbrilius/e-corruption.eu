import TotalNotes from '../components/user/Dashboard/basic-ETL/total-notes.svelte';
export const totalPayments = new TotalNotes({
  target: document.getElementById('totalNotes')
});

import MembershipStatus from '../components/user/Dashboard/membership-status.svelte';
export const membershipStatus = new MembershipStatus({
  target: document.getElementById('membershipStatus')
});
