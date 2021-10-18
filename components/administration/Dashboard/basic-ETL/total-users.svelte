<script>
  import { totalUsersStore } from "./total-users-store.js";
  import { onDestroy } from "svelte";

  let totalUsersData = [];

  totalUsersStore.subscribe((value) => {
    totalUsersData = value;
  });

  const unsubscribe = totalUsersStore.subscribe((data) => {
    totalUsersData = data;
  });

  onDestroy(unsubscribe);
</script>

<p class="fs-5">
  <span class="fw-bolder">Total</span>
  <span class="fst-italic">Users:</span>
  {#if $totalUsersStore}
    {#each $totalUsersStore as item}{item.totalUsers}{/each}
  {/if}
</p>
