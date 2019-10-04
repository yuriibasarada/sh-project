new Vue({
    el: '#product',
    data: {
        photos: [],
        totalPhotos: 0,
        perPage: 9,
        currentPage: 1,
        errors: []
    },
    methods: {
        fetchPhotos: function(page) {
            axios.post('http://sh-shop/app', {
                page: page,
                limit: this.perPage
            })
                .then(response => {
                    this.totalPhotos = parseInt(response.data.totalCount),
                        this.photos = response.data.product
                    this.currentPage = page

                })
                .catch(e => {
                    this.errors.push(e)
                })
        }
    },
    created: function() {
        this.fetchPhotos(this.currentPage)
    }

});