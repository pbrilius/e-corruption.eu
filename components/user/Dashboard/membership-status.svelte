<script>
  import { membershipStatusStore } from "./membership-status-store.js";
  import { onDestroy } from "svelte";

  let membershipStatusData = [];

  membershipStatusStore.subscribe((value) => {
    membershipStatusData = value;
  });

  const unsubscribe = membershipStatusStore.subscribe((data) => {
    membershipStatusData = data;
  });

  onDestroy(unsubscribe);
</script>

<p class="fs-5">
  <span class="fw-bolder">Subscription</span> User
  <span class="fst-italic">Membership:</span>
  {#if $membershipStatusStore}
    {#each $membershipStatusStore as item}{item.type}{/each}
  {/if}
</p>
