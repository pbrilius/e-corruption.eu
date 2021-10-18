<script>
  import { totalPaymentsStore } from "./total-payments-store.js";
  import { onDestroy } from "svelte";

  let totalPaymentsData = [];

  totalPaymentsStore.subscribe((value) => {
    totalPaymentsData = value;
  });

  const unsubscribe = totalPaymentsStore.subscribe((data) => {
    totalPaymentsData = data;
  });

  onDestroy(unsubscribe);
</script>

<p class="fs-5">
  <span class="fw-bolder">Total</span>
  <span class="fst-italic">Payments:</span>
  {#if $totalPaymentsStore}
    {#each $totalPaymentsStore as item}{item.totalPayments}{/each}
  {/if}
</p>
