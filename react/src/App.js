import React, { Component } from "react";
import { hot } from "react-hot-loader";
import SearchComponent from "./components/SearchComponent";

class App extends Component{
    render() {
        return(
            <span>
                <h1>Platforms Rates</h1>
                <span>
                    <SearchComponent />
                </span>
            </span>
        );
    }
}

export default hot(module)(App);