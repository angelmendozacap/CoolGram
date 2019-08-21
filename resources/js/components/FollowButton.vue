<template>
  <div>
    <button href="#" class="ml-3 btn btn-sm btn-outline-success" @click="followUser" v-text="buttonText"></button>
  </div>
</template>

<script>
  export default {
    props: [
      'userId', 'follows'
    ],
    data() {
      return {
        status: this.follows,
      }
    },
    methods: {
      async followUser() {
        try {
          const res = await axios.post(`/follow/${this.userId}`)
          this.status = !this.status
        } catch (error) {
          if (error.response.status === 401) {
            window.location = '/login'
          }
        }
      }
    },
    computed: {
      buttonText() {
        return this.status ? 'Dejar de Seguir' : 'Seguir'
      }
    }
  }
</script>
