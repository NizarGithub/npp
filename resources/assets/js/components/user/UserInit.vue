<template>
  <div id="user_init">

  </div>
</template>
<script>
export default {
  name: "user_init",
  data: () => ({

  }),
  mounted(){
    this.get_user()
  },
  methods: {
    get_user(){
      axios.get('/api/user-data').then((resp) => {
        if (resp.status == 200) {
          // console.log(resp.data.unreads);
          this.$store.commit('user_mutation', resp.data.user);
          this.$store.commit('profile_mutation', resp.data.user.profile);
          this.$store.commit('avatar_mutation', resp.data.user.profile.photo_path);
          this.$store.commit('dream_mutation', resp.data.user.dream);
          this.$store.commit('dream_photo_mutation', resp.data.user.dream.photo);
          this.$store.commit('is_auth_mutation', true);
          resp.data.unreads.forEach((unread)=>{
            this.$store.commit('unread_nots_mutation', unread);
          });
        }
      });
    }
  }
}
</script>
<style lang="scss" scoped>
</style>
