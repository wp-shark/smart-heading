import { __ } from '@wordpress/i18n';
import { memo } from '@wordpress/element';
import { InspectorControls } from '@wordpress/block-editor';
import {
	__experimentalToggleGroupControl as ToggleGroupControl,
	__experimentalToggleGroupControlOption as ToggleGroupControlOption,
	PanelBody, TextControl, TextareaControl, FontSizePicker, ColorPicker, RangeControl
} from '@wordpress/components';

const Settings = ({ attributes, setAttributes }) => { 

	const { headingText, descriptionText, headingTitleSize, headingTitleColor, headingTitleMarginBottom, headingTitleAlignment, descriptionTextSize, descriptionTextColor, descriptionTextMarginBottom, descriptionTextAlignment } = attributes;

	return (
		<>	
			<InspectorControls>
				<PanelBody
					title={ __( 'Content', 'smart-heading' ) }
				>
					<TextControl
						__nextHasNoMarginBottom
						label="Heading Text"
						value={ headingText }
						onChange={ ( value ) => setAttributes( { headingText: value } ) }
					/>
					<TextareaControl
						__nextHasNoMarginBottom
						label="Description Text"
						help="Enter Description text"
						value={ descriptionText }
						onChange={ ( value ) => setAttributes( { descriptionText: value } ) }
					/>
				</PanelBody>
				<PanelBody
					title={ __( 'Heading Title Style', 'smart-heading' ) }
				>
					<FontSizePicker
						fallbackFontSize={26}
						fontSizes={[
							{
							name: 'Small',
							size: 12,
							slug: 'small'
							},
							{
							name: 'Normal',
							size: 16,
							slug: 'normal'
							},
							{
							name: 'Big',
							size: 26,
							slug: 'big'
							}
						]}
						value={headingTitleSize}
						onChange={ ( value ) => setAttributes( { headingTitleSize: value } ) }
						withSlider
					/>
					<ColorPicker 
						value={headingTitleColor}
						onChange={ ( value ) => setAttributes( { headingTitleColor: value } ) }
					/>
					<RangeControl
						__nextHasNoMarginBottom
						label="Margin Bottom"
						max={100}
						min={0}
						value={headingTitleMarginBottom}
						onChange={ ( value ) => setAttributes( { headingTitleMarginBottom: value } ) }
					/>
					<ToggleGroupControl
						__nextHasNoMarginBottom
						isBlock
						label="Alignment"
						value={headingTitleAlignment}
						onChange={ ( value ) => setAttributes( { headingTitleAlignment: value } ) }
						>
						<ToggleGroupControlOption
							label="Left"
							value="left"
						/>
						<ToggleGroupControlOption
							label="Center"
							value="center"
						/>
						<ToggleGroupControlOption
							label="Right"
							value="right"
						/>
					</ToggleGroupControl>
				</PanelBody>
				<PanelBody
					title={ __( 'Description Style', 'smart-heading' ) }
				>
					<FontSizePicker
						fallbackFontSize={16}
						fontSizes={[
							{
							name: 'Small',
							size: 12,
							slug: 'small'
							},
							{
							name: 'Normal',
							size: 16,
							slug: 'normal'
							},
							{
							name: 'Big',
							size: 26,
							slug: 'big'
							}
						]}
						value={descriptionTextSize}
						onChange={ ( value ) => setAttributes( { descriptionTextSize: value } ) }
						withSlider
					/>
					<ColorPicker 
						value={descriptionTextColor}
						onChange={ ( value ) => setAttributes( { descriptionTextColor: value } ) }
					/>
					<RangeControl
						__nextHasNoMarginBottom
						label="Margin Bottom"
						max={100}
						min={0}
						value={descriptionTextMarginBottom}
						onChange={ ( value ) => setAttributes( { descriptionTextMarginBottom: value } ) }
					/>
					<ToggleGroupControl
						__nextHasNoMarginBottom
						isBlock
						label="Alignment"
						value={descriptionTextAlignment}
						onChange={ ( value ) => setAttributes( { descriptionTextAlignment: value } ) }
						>
						<ToggleGroupControlOption
							label="Left"
							value="left"
						/>
						<ToggleGroupControlOption
							label="Center"
							value="center"
						/>
						<ToggleGroupControlOption
							label="Right"
							value="right"
						/>
					</ToggleGroupControl>
				</PanelBody>
			</InspectorControls>
		</>
	)
}

export default memo(Settings);