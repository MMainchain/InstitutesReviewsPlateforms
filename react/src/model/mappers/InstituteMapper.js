import Institute from "../entities/Institute";


export default class InstituteMapper {

    constructor(json) {
        const label = json.label;
        const reviews = json.reviews;
        const platformRates = json.platformRates;

        this.deserializedInstitute = new Institute(
            label,
            reviews.map(review => new ReviewMapper(review).get()),
            platformRates.map(platformRate => new PlatformsMapper(platformRate).get())
        );
    }

    get() {
        return this.deserializedInstitute;
    }
}