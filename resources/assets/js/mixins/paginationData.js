export default {
  computed: {
    isActived() {
      return this.pagination.current_page
    },

    pagesNumber() {
      if (!this.pagination.to) {
        return []
      }

      var from = this.pagination.current_page - this.offset
      if (from < 1) {
        from = 1
      }

      var to = from + (this.offset * 2)
      if (to >= this.pagination.last_page) {
        to = this.pagination.last_page
      }

      var pagesArray = []
      while (from <= to) {
        pagesArray.push(from)
        from++
      }
      return pagesArray
    },
  },
}
