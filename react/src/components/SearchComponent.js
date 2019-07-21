import React, { Component } from "react";

class SearchComponent extends Component{
    render() {
        return(
            <span>
                <label htmlFor="test">Institute name : </label>
                <input name="test" type="text" value="Radison blu"/>
                <label htmlFor="test">Platform name : </label>
                <input type="text" value="Airbnb"/>
                <button>Show stats</button>
            </span>
        );
    }
}

export default (SearchComponent);