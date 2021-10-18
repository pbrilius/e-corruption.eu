<script>
  import { totalAuditsStore } from "./total-audit-bots-store.js";
  import { onDestroy } from "svelte";

  let totalAuditsData = [];

  totalAuditsStore.subscribe((value) => {
    totalAuditsData = value;
  });

  const unsubscribe = totalAuditsStore.subscribe((data) => {
    totalAuditsData = data;
  });

  onDestroy(unsubscribe);
</script>

<p class="fs-5">
  <span class="fw-bolder">Total</span>
  <span class="fst-italic">Audit Bots:</span>
  {#if $totalAuditsStore}
    {#each $totalAuditsStore as item}{item.totalAudits}{/each}
  {/if}
</p>
