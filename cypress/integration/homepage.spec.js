/// <reference types="cypress"/>
describe('Carga la página principal', () => {
    it('Prueba el Header de la página principal', () => {
        cy.visit('/');

        cy.get('[data-cy="heading-sitio"]').should('exist');
        cy.get('[data-cy="heading-sitio"]').invoke('text').should('equal', "Venta de Casas y Departamentos de Lujo");
        cy.get('[data-cy="heading-sitio"]').invoke('text').should('not.equal', "Bienes Raices");
    });

    it('Prueba el Bloque de los Iconos Principales', () => {
        cy.get('[data-cy="heading-nosotros"]').should('exist');
        cy.get('[data-cy="heading-nosotros"]').should('have.prop', 'tagName').should('equal', 'H2');

        //Selecciona los iconos
        cy.get('[data-cy="iconos-nosotros"]').should('exist');
        cy.get('[data-cy="iconos-nosotros"]').find('.icono').should('have.length', 3);
    });

    it('Prueba la seccion de propiedades', () => {
        //Debe haber tres propiedades
        cy.get('[data-cy="anuncio"]').should('have.length', 3);
        cy.get('[data-cy="anuncio"]').should('not.have.length', 5);

        //Probar enlace de las propiedades
        cy.get('[data-cy="enlace-propiedad"]').should('have.class', 'boton-amarillo-block');
        cy.get('[data-cy="enlace-propiedad"]').should('not.have.class', 'boton-amarillo');
        cy.get('[data-cy="enlace-propiedad"]').first().invoke('text').should('equal', 'Ver propiedad');

        //Probar el enlace a una propiedad
        cy.get('[data-cy="enlace-propiedad"]').first().click();
        cy.get('[data-cy="titulo-propiedad"]').should('exist');
        
        cy.go('back');
    });

    it('Prueba el Routing hacia todas las propiedades', () => {
        cy.get('[data-cy="todas-propiedades"]').should('exist');
        cy.get('[data-cy="todas-propiedades"]').should('have.class', 'boton-verde');
        cy.get('[data-cy="todas-propiedades"]').invoke('attr', 'href').should('equal', '/propiedades');
        
        cy.get('[data-cy="todas-propiedades"]').click();
        cy.get('[data-cy="heading-propiedades"]').invoke('text').should('equal', 'Casas y Departamentos en Venta');

        cy.go('back');
    });

    it('Prueba el bloque de contacto', () => {
        cy.get('[data-cy="imagen-contacto"]').should('exist');
        cy.get('[data-cy="imagen-contacto"]').find('h2').invoke('text').should('equal', 'Encuentra la Casa de tus Sueños');
        cy.get('[data-cy="imagen-contacto"]').find('p').invoke('text').should('equal', 'LLena el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad');

        cy.get('[data-cy="imagen-contacto"]').find('a').invoke('attr', 'href').then(href => {
            cy.visit(href);
        });

        cy.get('[data-cy="heading-contacto"]').should('exist');
        cy.visit('/');
    });

    it('Prueba los Testimoniales y el Blog', () => {
        cy.get('[data-cy="blog"]').should('exist');
        cy.get('[data-cy="blog"]').find('h3').invoke('text').should('exist', 'Nuestro Blog');
        cy.get('[data-cy="blog"]').find('img').should('have.length', 2);

        cy.get('[data-cy="testimoniales"]').should('exist');
        cy.get('[data-cy="testimoniales"]').find('h3').invoke('text').should('exist', 'TEstimoniales');
    });
});