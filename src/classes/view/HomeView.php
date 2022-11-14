<?php

namespace atelier\view;

class HomeView extends AppView {
    public function render() : string{
        $html = <<<BLADE
            <h1>Galeries</h1>
            <div class="gallery">
                <div class="gallery-item">
                    <div class="gallery-content">
                        <div class="image">
                            <img src="https://source.unsplash.com/1600x900/?nature" alt="nature">
                        </div>
                        <div class="text">Nature</div>
                    </div>
                </div>
        
                <div class="gallery-item">
                    <div class="gallery-content">
                        <div class="image">
                            <img src="https://source.unsplash.com/1600x900/?people" alt="people">
                        </div>
                        <div class="text">People</div>
                    </div>
                </div>
            
                <div class="gallery-item">
                    <div class="gallery-content">
                        <div class="image">
                            <img src="https://source.unsplash.com/1600x900/?sport" alt="sport">
                        </div>
                        <div class="text">Sport</div>
                    </div>
                </div>
            
                <div class="gallery-item">
                    <div class="gallery-content">
                        <div class="image">
                            <img src="https://source.unsplash.com/1600x900/?fitness" alt="fitness">
                        </div>
                        <div class="text">Fitness</div>
                    </div>
                </div>
            
                <div class="gallery-item">
                    <div class="gallery-content">
                        <div class="image">
                            <img src="https://source.unsplash.com/1600x900/?food" alt="food">
                        </div>
                        <div class="text">Food</div>
                    </div>
                </div>
            
                <div class="gallery-item">
                    <div class="gallery-content">
                        <div class="image">
                            <img src="https://source.unsplash.com/1600x900/?travel" alt="travel">
                        </div>
                        <div class="text">Travel</div>
                    </div>
                </div>
            
                <div class="gallery-item">
                    <div class="gallery-content">
                        <div class="image">
                            <img src="https://source.unsplash.com/1600x900/?art" alt="art">
                        </div>
                        <div class="text">Art</div>
                    </div>
                </div>

                <div class="gallery-item">
                    <div class="gallery-content">
                        <div class="image">
                            <img src="https://source.unsplash.com/1600x900/?cars" alt="cars">
                        </div>
                        <div class="text">Cars</div>
                    </div>
                </div>

                <div class="gallery-item">
                    <div class="gallery-content">
                        <div class="image">
                            <img src="https://source.unsplash.com/1600x900/?cars" alt="cars">
                        </div>
                        <div class="text">Cars</div>
                    </div>
                </div>

                <div class="gallery-item">
                    <div class="gallery-content">
                        <div class="image">
                            <img src="https://source.unsplash.com/1600x900/?cars" alt="cars">
                        </div>
                        <div class="text">Cars</div>
                    </div>
                </div>

                <div class="gallery-item">
                    <div class="gallery-content">
                        <div class="image">
                            <img src="https://source.unsplash.com/1600x900/?cars" alt="cars">
                        </div>
                        <div class="text">Cars</div>
                    </div>
                </div>

                <div class="gallery-item">
                    <div class="gallery-content">
                        <div class="image">
                            <img src="https://source.unsplash.com/1600x900/?cars" alt="cars">
                        </div>
                        <div class="text">Cars</div>
                    </div>
                </div>

                <div class="gallery-item">
                    <div class="gallery-content">
                        <div class="image">
                            <img src="https://source.unsplash.com/1600x900/?cars" alt="cars">
                        </div>
                        <div class="text">Cars</div>
                    </div>
                </div>

                <div class="gallery-item">
                    <div class="gallery-content">
                        <div class="image">
                            <img src="https://source.unsplash.com/1600x900/?cars" alt="cars">
                        </div>
                        <div class="text">Cars</div>
                    </div>
                </div>

                <div class="gallery-item">
                    <div class="gallery-content">
                        <div class="image">
                            <img src="https://source.unsplash.com/1600x900/?cars" alt="cars">
                        </div>
                        <div class="text">Cars</div>
                    </div>
                </div>

                <div class="gallery-item">
                    <div class="gallery-content">
                        <div class="image">
                            <img src="https://source.unsplash.com/1600x900/?cars" alt="cars">
                        </div>
                        <div class="text">Cars</div>
                    </div>
                </div>

                <div class="gallery-item">
                    <div class="gallery-content">
                        <div class="image">
                            <img src="https://source.unsplash.com/1600x900/?cars" alt="cars">
                        </div>
                        <div class="text">Cars</div>
                    </div>
                </div>

                <div class="gallery-item">
                    <div class="gallery-content">
                        <div class="image">
                            <img src="https://source.unsplash.com/1600x900/?cars" alt="cars">
                        </div>
                        <div class="text">Cars</div>
                    </div>
                </div>

                <div class="gallery-item">
                    <div class="gallery-content">
                        <div class="image">
                            <img src="https://source.unsplash.com/1600x900/?cars" alt="cars">
                        </div>
                        <div class="text">Cars</div>
                    </div>
                </div>

                <div class="gallery-item">
                    <div class="gallery-content">
                        <div class="image">
                            <img src="https://source.unsplash.com/1600x900/?cars" alt="cars">
                        </div>
                        <div class="text">Cars</div>
                    </div>
                </div>

                <div class="gallery-item">
                    <div class="gallery-content">
                        <div class="image">
                            <img src="https://source.unsplash.com/1600x900/?cars" alt="cars">
                        </div>
                        <div class="text">Cars</div>
                    </div>
                </div>

                <div class="gallery-item">
                    <div class="gallery-content">
                        <div class="image">
                            <img src="https://source.unsplash.com/1600x900/?cars" alt="cars">
                        </div>
                        <div class="text">Cars</div>
                    </div>
                </div>
            </div>
            <div id="pagination">
                <a>Précédente</a>
                <a>Suivante</a>
            </div>
        BLADE;

        return $html;
    }
}