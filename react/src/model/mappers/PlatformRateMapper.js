import PlatformRate from "../entities/PlatformRate";
import PlatformMapper from "./PlatformMapper";
import InstituteMapper from "./InstituteMapper";

export class PlatformRateMapper {

    constructor(json) {
        const rate = json.rate;
        const date = json.date;
        const platform = json.platform;
        const institute = json.institute;

        this.deserializedPlatformRate = new PlatformRate(
            rate,
            date,
            new PlatformMapper(platform).get(),
            new InstituteMapper(institute).get()
        );
    }

    get() {
        return this.deserializedPlatformRate;
    }
}