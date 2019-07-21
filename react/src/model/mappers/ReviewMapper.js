import Review from "../entities/Review";
import PlatformMapper from "./PlatformMapper";
import InstituteMapper from "./InstituteMapper";

export class ReviewMapper {

    constructor(json) {
        const label = json.label;
        const date = json.date;
        const author = json.author;
        const comment = json.comment;
        const platform = json.platform;
        const institute = json.institute;

        this.deserializedPlatformRate = new Review(
            label,
            date,
            author,
            comment,
            new PlatformMapper(platform).get(),
            new InstituteMapper(institute).get()
        );
    }

    get() {
        return this.deserializedPlatformRate;
    }
}