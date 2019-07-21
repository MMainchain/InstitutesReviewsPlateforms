import Platform from "../entities/Platform";


export default class PlatformMapper {

    constructor(json) {
        const label = json.label;
        const reviews = json.reviews;
        const platformRates = json.platformRates;

        this.deserializedPlatform = new Platform(
            label,
            reviews.map(review => new ReviewMapper(review).get()),
            platformRates.map(platformRate => new PlatformsMapper(platformRate).get())
        );
    }

    get() {
        return this.deserializedPlatform;
    }
}