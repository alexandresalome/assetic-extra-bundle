AlexAsseticExtraBundle
======================

.. image:

.. image:: https://travis-ci.org/alexandresalome/assetic-extra-bundle.png?branch=master
   :alt: Build status
   :target: https://travis-ci.org/alexandresalome/assetic-extra-bundle

Provides an additional filter for `Assetic <https://github.com/kriswallsmith/assetic>`_:
**asset directory**.

This filter will process your CSS and copy assets to a directory, usually in ``web/``
folder.

By doing so, you can include CSS images and fonts from external libraries without storing
dependency in a public folder.

Installation
------------

Edit your ``composer.json`` and add the following package as a **require**:

.. code-block:: json

    {
        "require": {
            "alexandresalome/assetic-extra-bundle": "dev-master"
        }
    }

Edit your ``app/AppKernel.php`` and add the bundle to the **registerBundles** method:

Configuration
-------------

Edit your ``config.yml`` and add a section **alex_assetic_extra**:

.. code-block:: yaml

    alex_assetic_extra:
        asset_directory:
            enabled: true

            # Indicates where assets should be copied to
            # when processing CSS files.
            path: %kernel.root_dir%/../web/assets

            # Not really clear yet
            target: assets

Or to quickly use it:

.. code-block:: yaml

    alex_assetic_extra:
        asset_directory: true

Usage
-----

To use it, use the filter in your ``{% stylesheets %}`` template blocks:

.. code-block:: html+jinja

    {% stylesheets filters="combine,assetdirectory"
        "@SomeBundle/Resources/assets/form.css"
        "../vendor/path/to/some.js"
    %}
        {# ... #}
    {% endstylsheets %}

Changelog
---------

**v0.1**

* Initial version
