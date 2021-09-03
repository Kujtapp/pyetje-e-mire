<template>
  <footer class="p-0">
    <div class="bg-primary p-2">
      <p class="text-white mt-2 ml-3">Copyright pyetje e mirë 2020-{{ getThisYear }}</p>
    </div>
  </footer>
</template>

<script>
export default {

data() {
    return {
        thisYear: null
    }
},

computed: {
    // a computed getter
    getThisYear: function () {
      // `this` points to the vm instance
      this.thisYear = new Date().getFullYear();

      return this.thisYear;
    }
  }

}
</script>
