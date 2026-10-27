#!/usr/bin/env python3
"""setup.py for cli-anything-figma."""

from setuptools import find_namespace_packages, setup

setup(
    name="cli-anything-figma",
    version="1.0.0",
    description="CLI harness for Figma — inspect files, dump layout JSON, export references and fills",
    packages=find_namespace_packages(include=["cli_anything.*"]),
    python_requires=">=3.10",
    install_requires=["click>=8.0"],
    entry_points={"console_scripts": ["figma=cli_anything.figma.figma_cli:main"]},
)
