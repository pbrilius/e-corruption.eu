<script>
  import { totalLoansStore } from "./total-loans-store.js";
  import { onDestroy } from "svelte";

  let totalLoansData = [];

  totalLoansStore.subscribe((value) => {
    totalLoansData = value;
  });

  const unsubscribe = totalLoansStore.subscribe((data) => {
    totalLoansData = data;
  });

  onDestroy(unsubscribe);
</script>

<p class="fs-5">
  <span class="fw-bolder">Total</span>
  <span class="fst-italic">Loans:</span>
  {#if $totalLoansStore}
    {#each $totalLoansStore as item}{item.totalLoans}{/each}
  {/if}
</p>
