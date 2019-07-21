export default class API {

    constructor() {
        this.BASE_URL = "http://localhost:8000";
    }

    /**
     * Platforms
     */

    getInstitute(id) {
        const URL = `${this.BASE_URL}/institutes/${id}`;
        // TODO
    }

    getInstitutes() {
        const URL = `${this.BASE_URL}/institutes`;
        // TODO
    }

    getInstituteByPlatformRate(id) {
        const URL = `${this.BASE_URL}/rates/${id}/institutes`;
        // TODO
    }

    getInstituteByReview(id) {
        const URL = `${this.BASE_URL}/reviews/${id}/institutes`;
        // TODO
    }

    /**
     * Platforms
     */

    getPlatform(id) {
        const URL = `${this.BASE_URL}/platforms/${id}`;
        // TODO
    }

    getPlatforms() {
        const URL = `${this.BASE_URL}/platforms`;
        // TODO
    }

    getPlatformByPlatformRate(id) {
        const URL = `${this.BASE_URL}/rates/${id}/platforms`;
        // TODO
    }

    getPlatformByReview(id) {
        const URL = `${this.BASE_URL}/reviews/${id}/platforms`;
        // TODO
    }

    /**
     * Rates
     */

    getRate(id) {
        const URL = `${this.BASE_URL}/rates/${id}`;
        // TODO
    }

    getRates() {
        const URL = `${this.BASE_URL}/rates`;
        // TODO
    }

    getRatesByPlatform(id) {
        const URL = `${this.BASE_URL}/platforms/${id}/rates`;
        // TODO
    }

    getRatesByInstitute(id) {
        const URL = `${this.BASE_URL}/institutes/${id}/rates`;
        // TODO
    }

    /**
     * Reviews
     */

    getReview(id) {
        const URL = `${this.BASE_URL}/reviews/${id}`;
        // TODO
    }

    getReviews() {
        const URL = `${this.BASE_URL}/reviews`;
        // TODO
    }

    getReviewByInstitute(id) {
        const URL = `${this.BASE_URL}/institutes/${id}/reviews`;
        // TODO
    }

    getReviewByPlatform(id) {
        const URL = `${this.BASE_URL}/platforms/${id}/reviews`;
        // TODO
    }
}