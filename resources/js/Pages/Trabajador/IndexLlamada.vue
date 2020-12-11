<template>
<app-layout>
  <div>
    <h1 class="mb-8 font-bold text-3xl">cliente</h1>


    




  </div>
       
</app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout' 
// import Pagination from '@/Shared/Pagination'


export default { 
 
  components:{
    AppLayout
  },
  props: {
    cliente: Object,
    // filters: Object,
  },
  data() {
    return {
      form: {
        search: this.filters.search,
        // trashed: this.filters.trashed,
      },
    }
  },
  watch: {
    form: {
      handler: throttle(function() {
        let query = pickBy(this.form)
        this.$inertia.replace(this.route('llamadas', Object.keys(query).length ? query : { remember: 'forget' }))
      }, 150),
      deep: true,
    },
  },
  methods: {
    reset() {
      this.form = mapValues(this.form, () => null)
    },
  },
}
</script>

