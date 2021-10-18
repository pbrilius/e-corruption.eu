<script>
  import { totalNotesStore } from "./total-notes-store.js";
  import { onDestroy } from "svelte";

  let totalNotesData = [];

  totalNotesStore.subscribe((value) => {
    totalNotesData = value;
  });

  const unsubscribe = totalNotesStore.subscribe((data) => {
    totalNotesData = data;
  });

  onDestroy(unsubscribe);
</script>

<p class="fs-5">
  <span class="fw-bolder">Total</span> User
  <span class="fst-italic">Notes:</span>
  {#if $totalNotesStore}
    {#each $totalNotesStore as item}{item.totalNotes}{/each}
  {/if}
</p>
