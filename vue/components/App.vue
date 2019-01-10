<template>
    <div>
        <router-link to="/notes/add">Добавить заметку</router-link>
        
        <router-view></router-view>

        <router-link to="/notes">Назад</router-link>
    </div>
</template>

<script>
   
export default {
        
  data () {
    return {
    }  
  },
        
  mounted: function () {
    //console.log('App component mounted');
  },

  methods: {

  }
}
</script>

<style>

</style>